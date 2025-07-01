function fill(Value) {
  $('#search').val(Value);
  $('#display').hide();
}

$(document).ready(function() {
  $("#search").keyup(function() {
    var name = $('#search').val();
    if (name == "") {
      $("#display").html("");
    } else {
      $.ajax({
        type: "POST",
        url: "Ajax.php",
        data: {
          search: name
        },
        dataType: 'html',
        success: function(html) {
        if (html != "") {
            $("#display").html(html).show();
        } else {
            $("#display").html("No results found").show();
        }
        }
      });
    }
  });
});