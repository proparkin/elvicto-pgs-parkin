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

    .slot-box 
    {
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

    .slot-box input[type="checkbox"] 
    {
        position: absolute;
        top: 5px;
        left: 5px;
    }

    .slot-box:hover.available { transform: scale(1.05); background-color: #28a745; color: white; }

  </style>
</head>
<body>

  <!-- Header -->
  <div class="container-fluid p-3 text-white text-center" style="background:#9948ac;height:75px;">
  </div>

  <!-- Legend -->
  <div class="container mt-3">
    <div class="align-items-center">
      <div style="text-align:center;">Slot Update</div>
      
    </div>
  </div>

  <!-- Main Container -->
  <div class="container mt-4">
    <form class="form-box" action="{{ url('slot_update') }}" method="POST" enctype="multipart/form-data">
    @csrf
        <div class="row">

        <!-- Left Bay -->
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">Block Name</label>
                <select class="form-select" name="block_id" required="" id="block_id">
                    <option value="">Select Block</option>
                    @foreach($datas as $data)
                    <option value="{{$data->id}}">{{$data->block_name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Straight Bay -->
      
        <div class="col-sm-4">
            <div class="form-group">
                <label for="name">Lamp</label>
                <select class="form-select" name="lamp_id" required="">
                    <option value="">Select Lamp</option>
                    @foreach($lamps as $lamp)
                    <option value="{{$lamp->id}}">{{$lamp->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

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
        var block_id = $(this).val();
        if(block_id) 
        {
            $.ajax({
                url: '/get-slots/' + block_id,
                type: 'GET',
                dataType: 'json',
                success: function(data)
                {
                    var html = '';
                    html += '<label for="slots" style="width:100%;">Select Slots</label>';
                    if(data.length > 0)
                    {
                        $.each(data, function(key, slot)
                        {
                            var statusClass = 'available';
                        
                            html += '<label class="slot-box '+statusClass+'">';
                            html += '<input type="checkbox" name="slots[]" value="'+slot.slot_number+'" >';
                            html += slot.slot_number;
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
