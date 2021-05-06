<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

        .card {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            max-width: 800px;
            margin: auto;
            text-align: center;
            font-family: arial;
        }
        .mainDiv
        {
            display: flex;
            border: 1px solid saddlebrown;

        }

        .information
        {
            color: #3498db;
            margin: 20px 0px 20px 20px;
            padding: 20px 0px 20px 20px;
        }
        .information1
        {
            color: #242526;
            margin: 20px 0px 20px 20px;
            padding: 20px 0px 20px 20px;
        }
        
        /* Css for star rating and reviews */
        .comments {
            width: 40%;
            float: none;
            text-align: left;
            margin-left: 5%;
            padding: 20px 0px;
            border-bottom: 1px solid gray;
            float: left;
        }
        
        .reviews {
            overflow: hidden;
        }
        .reviews button {
            display: inline-block;
            text-decoration: none;
            background: #F89C0E;
            color: #fff;
            padding: 10px 20px;
            border-radius: 3px;
            margin-top: 15px;
            border: none;
            cursor: pointer;
        }
        .comments .person {
            height: 60px;
            width: 60px;
            border-radius: 100%;
            background: gray;
            float: left;
            margin-right: 10%;
        }
        .comments .comment_r {
            overflow: hidden;
        }
        .comments .comment_r p {
            margin-top: 3px;
        }
        
        /*css for popup review*/
        .popup_review {
            display: none;
            width: 400px;
            position: fixed;
            top: 30%;
            left: 50%;
            margin-left: -200px;
            background: black;
            border-radius: 10px;
            padding-bottom: 30px;
        }
        
        .popup_review .review {
            margin-top: 20px;
            margin-bottom: 15px;
        }
        
        .popup_review .close_pop {
            color: red;
            font-size: 25px;
            position: absolute;
            left: 94%;
            bottom: 90%;
            cursor: pointer;
        }
        
        .popup_review button {
            background: #f79604;
            border: none;
            padding: 10px 109px;
            font-size: ;
            color: #fff;
            cursor: pointer;
            margin-top: 20px;
        }
        
        .popup_review input[type="text"] {
            padding: 10px 116px 10px 4px;
            border-radius: 5px;
            border: none;
        }
        .popup_review textarea {
            padding: 10px 0px 10px 4px;
            border-radius: 5px;
            border: none;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<h2 style="text-align:center">User Profile</h2>
<?php
$x = $_REQUEST['id'];
function conectionStart()
{
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cheif_information";
    $connection = mysqli_connect($servername, $username, $password,
        $dbname);
    return $connection;
}

function conectionEnd($value)
{
    mysqli_close($value);
}


$connection = conectionStart();  
 
//Getting average rating
$getting_review = "SELECT AVG(rating) AS average FROM ratings WHERE chef_id = $x";
    
$review_result = mysqli_query($connection, $getting_review);

$row = mysqli_fetch_assoc($review_result); 
$total_rating = mysqli_num_rows($review_result);
$average = $row['average'];

$average = round($average,1);
    
    
    
//Getting cheif info
$sql = "SELECT id, name, image,experienceYear,specalist,expectedSalary FROM chefs WHERE id=$x";

$result = mysqli_query($connection, $sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>";
        echo "<img src='uploads/" . $row['image'] . "' alt='John' style='width:100%'>";
        echo "<div class='mainDiv' >
         <h3 class='information'>name:</h3> 
         <h3 class='information1'>" . $row['name'] . "</h3>
         </div>";
        echo "<div class='mainDiv'>
         <h3 class='information'>Experience Year:</h3> 
         <h3 class='information1'>" . $row['experienceYear'] . "</h3>
         </div>";
        echo "<div class='mainDiv' >
         <h3 class='information'>Expected Salary:</h3> 
         <h3 class='information1'>" . $row['expectedSalary'] . "</h3>
         </div>";
        echo "<div class='mainDiv' >
         <h3 class='information'>Specialist:</h3> 
         <h3 class='information1'>" . $row['specalist'] . "</h3>
         </div>
        <div class='mainDiv' >
             <h3 class='information'>Rating:</h3> 
             <h3 class='information1'>{$average}</h3>
        </div>";
        

    }
} else {
    echo "0 results";
}       
        
?>    
    <!--popup review modal-->
    <div class="popup_review">
        <i class="fa fa-close close_pop" ></i>
        <div class='review'>
            <i class='fa fa-star fa-2x' data-index='0'></i>
            <i class='fa fa-star fa-2x' data-index='1'></i>
            <i class='fa fa-star fa-2x' data-index='2'></i>
            <i class='fa fa-star fa-2x' data-index='3'></i>
            <i class='fa fa-star fa-2x' data-index='4'></i>
        </div>
        <div class='review-comment'>
            <input type="text" class="name" placeholder="Your Name:">
            <textarea class="comment" name='comment' id='' cols='30' rows='10' placeholder="Your comment:"></textarea> <br>
            <input class='c_id' type='hidden' value='<?php echo $x; ?>'>
            <button id='send'  name='send'>SUBMIT</button>
            <div class="res" style="color: green"></div>
        </div>
    </div>  
    
    <!--All reviews query-->
    <div class='reviews'> 
       <h2>All Reviews</h2> 
        <div class='comments'> 
        
<?php
        $get_comments = "SELECT id, chef_id, reviewer, rating , comment FROM ratings WHERE chef_id=$x";

        $result = mysqli_query($connection, $get_comments);

        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "
                        <div class='person'>

                        </div>
                        <div class='comment_r'>
                            <p>{$row['reviewer']}</p>
                            <p>Rating: {$row['rating']}</p>
                            <p>{$row['comment']}</p>
                        </div>
                    ";
            }
        } else {
            echo "0 results";
        }
conectionEnd($connection);


?>   
    </div>
        <button type="button" class="review_up">SUBMIT A REVIEW</button>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"></script>
      
    <script>
        
        var ratedIndex = -1;
        $(document).ready(function(){
            resetColor();
            $('.fa-star').on('click', function(){
                ratedIndex = parseInt($(this).data('index'));
            });
            
            $('.fa-star').mouseover(function() {
                resetColor();
                var currentInd = parseInt($(this).data('index'));
                setStars(currentInd);
            });            
            
            $('.fa-star').mouseleave(function() {
                resetColor();
                
                if(ratedIndex != -1){
                    setStars(ratedIndex);
                }
                
            });
            
            $('.review_up').on('click', function() {
                $('.popup_review').css('display', 'block');
            });       
            
            $('.close_pop').on('click', function() {
                $('.popup_review').css('display', 'none');
            });
            
            //sending ajax request with review data to review.php   
            $('#send').on('click',function(){
                var c_id = $('.c_id').val();
                var comment = $('.comment').val();
                var name = $('.name').val();
                $.ajax({
                    url:'review.php',
                    data:{
                        save: 1,
                        ratedIndex: ratedIndex,
                        c_id: c_id,
                        name: name,
                        comment: comment
                    },
                    type: 'POST',
                    success:function(data){
                        if(!data.error) {
                            $('.res').html(data);
                        }
                    }

                });
                  
                
            });

        });
        
        //functions to set stars
        function setStars(max) {
            for(var i=0; i<=max; i++){
                $('.fa-star:eq('+i+')').css('color', '#FCD599');
            }
        }
        
        //function to reset star color
        function resetColor() {
            $('.fa-star').css('color', 'white');
        }
    </script>
</body>
</html>
