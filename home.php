<?php
include 'connection.inc.php';

$country = "SELECT * FROM countries";
$county_qry = mysqli_query($conn, $country);



include 'include_common/header.php' ?>


    <div class="d-flex justify-content-center align-items-center">
        <div class="container my-5">
            <h1 class="text-center my-5">Welcome to User login</h1>
            <div class="card">
                <div class="card-body">
                   
                
                
                    <form action="db.php" method = "post">

                    <p>Name: </p>
                    <input type="text" name="name"><br><br>

                    <p>Mobile_Number</p>
                    <input type="number" name="mob"><br><br>

                    <p>Address </p>
                    <input type="text" name = addr><br><br>

                    <div class="input-group mb-3">
                        <select class="form-select" id="country" name="country">
                            <option selected disabled>Select Service</option>
                            <?php while ($row = mysqli_fetch_assoc($county_qry)) : ?>
                                <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" id="state" name='state'>
                            <option selected disabled>Select Provider</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" id="city" name="city">
                            <option selected disabled>Select Date</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <select class="form-select" id="time" name="time">
                            <option selected disabled>Select Time</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>  
                  <center><input type="submit"></center>  
                    </form>
<br><br><br><br><br>
<center>
<span class="login-signup btn btn-warning"><a href="logout.php" style="color:white">Logout</a></span>
</center>
<script>
    // County State

    $('#country').on('change', function() {
        var country_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/state.php',
            type: "POST",
            data: {
                country_data: country_id
            },
            success: function(result) {
                $('#state').html(result);
                // console.log(result);
            }
        })
    });
    // state city
    $('#state').on('change', function() {
        var state_id = this.value;
        // console.log(country_id);
        $.ajax({
            url: 'ajax/city.php',
            type: "POST",
            data: {
                state_data: state_id
            },
            success: function(data) {
                $('#city').html(data);
                // console.log(data);
            }
        })
    });
</script>