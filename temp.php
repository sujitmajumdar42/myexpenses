<html>
    <head>
        <script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
        <script type="text/javascript">
$.ajax({
        url: 'http://myexpense.comoj.com/test/myexpense/core/json/ViewExpense_JSON.json',
        dataType: 'json',
        success: function( data ) {
        alert( "SUCCESS:  " + data );
        },
    error: function( data ) {
      alert( "ERROR:  " + data );
    }
  });
  </script>
  <head>
  <body>
  </body>
  </html>