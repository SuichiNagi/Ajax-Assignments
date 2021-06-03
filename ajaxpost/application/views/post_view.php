<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX POST</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script>
      $(document).ready(function(){
        $.get('/posts/index_html', function(res) {
          $('#quotes').html(res);
        });
        $('form').submit(function(){
          $.post($(this).attr('action'), $(this).serialize(), function(res) {
            $('#quotes').html(res);
          });
          return false;
        });
      });
    </script>
</head>
<style>
    body{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .top-cont{
        height: 350px;
        overflow: scroll;
    }
        h1{
            margin: 15px;
        }

    form{
        height: 300px;
        width: 250px;
        margin: 15px 0 0 15px;
    }
    p{
        border: 1px solid black;
        width: 250px;
        height: 250px;
    }
    .post{
        display: inline-block;
    }
</style>
<body>
    <div class="top-cont">
        <h1>My Post:</h1>
        <div id="quotes">
        </div>
    </div>

    <form action="posts/create" method="post">
        <label>Add a note:</label>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Add Quote">
    </form>
</body>
</html>