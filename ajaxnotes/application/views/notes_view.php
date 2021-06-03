<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AJAX NOTES</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function()
        {
            $(document).on('submit', 'form', function()
            {
                
               var form = $(this);
               $.post(form.attr('action'),form.serialize(), function(data)
               {
                   $('#notes').html(data);
               });
               $("#create_note").trigger("reset");
               return false;
            });

            $(document).on('change', 'form.update_note textarea', function()
            {
                $(this).parent().submit();
            });
            $('form').submit();
        });
    </script>
    <style type="text/css">
        input, textarea{
            display: block;
            width: 250px;
            margin: 0 0 15px;
        }
        textarea{
            height: 100px;
        }
        .notes{
            border: 1px solid black;
            border-radius: 6px;
            display: inline-block;
            padding: 0 10px;
            margin: 0 10px 50px;
        }
        .btn{
            width: 100px;
            cursor: pointer;
        }
        .remove, .edit{
            margin: 0px 0 15px;
        }
    </style>
</head>
<body>
    <h1>Ajax Notes</h1>
    <div id="notes"></div>

    <h2>Create New Note</h2>
    <form id="create_note" class="create_note" action="/notes/create" method="post">
        Title <input type="text" name="title" placeholder="Enter Title">
        Description <textarea name="description" placeholder="Enter Description"></textarea>
        <input class="btn add" type="submit" value="Create Note">
    </form>
</body>
</html>