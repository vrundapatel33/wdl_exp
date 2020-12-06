<!DOCTYPE html>
<html>
<head>
  <title>jQuery autocomplete</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <style type="text/css">
    #search_container {text-align: center;}
    #results {text-align: left; border: solid 1px #777; display: none; margin: 0 auto; width: 180px;}
  </style>
</head>
<body>

<div id="search_container">
   <h2>Search for country</h2>
   <input type="text" name="country" id="country" autocomplete="off">
   <div id="results"></div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#country").keyup(function(){
      var query = $(this).val();
      if (query != "") {
        $.ajax({
                url: 'query.php',
                method: 'POST',
                data: {query:query},
                success: function(data)
                {
                  $('#results').html(data);
                  $('#results').css('display', 'block');

                    $("#country").focusout(function(){
                        $('#results').css('display', 'none');
                    });
                    $("#country").focusin(function(){
                        $('#results').css('display', 'block');
                    });

                }
        });
      } else {
             $('#results').css('display', 'none');
      }
    });
  });
</script>

</body>
</html>