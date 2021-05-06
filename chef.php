<html lang="en" dir="ltr">
<head>
    <title></title>
    <link href="style.css"  rel="stylesheet" type="text/css">
    <script>
        function usersearchTxt(str) {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById('searchTable').innerHTML =
                        this.responseText;
                }

            }
            xmlhttp.open("GET", "DBManager.php?search=" + str, true);
            xmlhttp.send();
        }
    </script>
</head>
<body style="background-color: #faf5ed">
<div class="form__group">
    <input type="text" name="" value=""  class="form__input" placeholder="search by anything" id="searchBox" required onkeyup="usersearchTxt(document.getElementById('searchBox').value)" >
    <label for="name" class="form__label">Searching...</label>
</div>
<div id="searchTable">
    <table>
        <?php
        include 'DBManager.php';
        echo fetch('');
        ?>
    </table>
</div>
</body>
</html>

<script>

</script>