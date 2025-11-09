<!DOCTYPE html>
<html lang="en">
<head>
  <title>Parking Layout</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .parking-slot {
      width: 60px;
      height: 60px;
      background-color: #e0e0e0;
      border: 2px solid #bbb;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      color: #333;
      transition: 0.3s ease;
      box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .parking-slot:hover {
      background-color: #28a745;
      color: white;
      transform: scale(1.05);
      cursor: pointer;
    }

    /* Status Styles */
    .parking-available {
      background-color: #e0e0e0;
    }

    .parking-occupied {
      background-color: #dc3545;
      color: white;
    }

    .parking-reserved {
      background-color: #ffc107;
      color: black;
    }

    /* Legend box */
    .legend-box {
      width: 20px;
      height: 20px;
      display: inline-block;
      margin-right: 5px;
      border-radius: 3px;
    }

    .card-title {
      background-color: #9948ac;
      color: white;
      padding: 8px;
      border-radius: 5px;
      text-align: center;
    }

    .slot-box {
    width: 60px;
    height: 60px;
    border: 2px solid #bbb;
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    cursor: pointer;
    position: relative;
    transition: 0.3s ease;
    user-select: none;
}

/* Slot colors based on status */
.slot-box.available {
    background-color: #28a745; /* green */
    color: white;
}

.slot-box.occupied {
    background-color: #dc3545; /* red */
    color: white;
}

.slot-box.unknown {
    background-color: #e0e0e0; /* grey/default */
    color: #333;
}

.slot-box input[type="checkbox"] 
{
    position: absolute;
    top: 5px;
    left: 5px;
}

  </style>
</head>
<body>

  <!-- Header -->
  <div class="container-fluid p-3 text-white text-center" style="background:#9948ac;height:75px;">
  </div>

  <!-- Legend -->
  <div class="container mt-3">
    <div class="align-items-center">
      <div style="text-align:center;">Check Lamp Status</div>
      
    </div>
  </div>

  <!-- Main Container -->
  <div class="container mt-4">
    <form class="form-box" action="{{ url('lamp_check') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">

        <!-- Left Bay -->
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">Lamp Name</label>
                <select class="form-select" name="lamp_id" required="" id="block_id">
                    <option value="">Select Block</option>
                    @foreach($datas as $data)
                    <option value="{{$data->id}}">{{$data->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Straight Bay -->

        <div class="col-lg-4">
            <div style="text-align: center;" class="col-lg-12">
                <button style="background:#124583;color:white;margin: 20px 0 20px 0;padding: 5px 12px 5px 12px;font-size:14px;margin-right:15px;" type="submit" class="btn">Submit</button>
            </div>
        </div>

        <div class="mt-3">
            <div id="slots-container" class="d-flex flex-wrap gap-2">
            
            </div>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        </div>
   </form>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function()
{
    $('#block_id').change(function() 
    {
        var lamp_id = $(this).val();
        if(lamp_id) 
        {
            $.ajax({
                url: '/get-lamp-slots/' + lamp_id,
                type: 'GET',
                dataType: 'json',
                success: function(data) 
                {
    var html = '';

    if (data.length > 0) {
        // 🔹 Get IP address from first slot only
        var ipAddress = data[0].ip_address || '';

        // 🔸 Show IP Address once in input field
        html += '<div style="margin-bottom:10px;">';
        html += '<label for="ip_address">IP Address:</label>';
        html += '<input type="text" id="ip_address" name="ip_address" class="form-control" value="' + ipAddress + '" readonly>';
        html += '</div>';

        // 🔹 Label for slots
        html += '<label for="slots" style="width:100%; font-weight:bold;">Select Slots</label>';

        // 🔹 Loop through slots
        $.each(data, function(key, slot) 
        {
            var statusClass = '';

            if (slot.status == 1) 
            {
                statusClass = 'available';  // Green
            } 
            else if (slot.status == 2) 
            {
                statusClass = 'occupied';   // Red
            } 
            else 
            {
                statusClass = 'unknown';
            }

            html += '<label class="slot-box ' + statusClass + '">';
            
            // ✅ Set checkbox value as status instead of slot number
            html += '<input type="radio" name="slot_id" value="' + slot.id + '" ';

            html += '>'; 
            html += slot.slot_number; // still show the slot number as label
            html += '</label>';
        });

    } 
    else 
    {
        html = '<p>No slots found for this block.</p>';
    }

    $('#slots-container').html(html);
}

            });
        } 
        else 
        {
            $('#slots-container').html('');
        }
    });
});
</script>

</body>
</html>
