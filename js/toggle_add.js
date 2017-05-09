$("#write_down").click(function() {
  var modWidth = "87.5%";
  $(".add_feed").css("height", 200);
  $("#add_feed_heading").show();
  $("#add_feed_heading").width( modWidth );
  // $("#add_feed_heading").focus();
  $("#write_down").width( modWidth );
  $(".add_feed_btn").css("top", 150);
  $(".cancel_feed_btn").css("top", 150);
  $(".cancel_feed_btn").show();
  $("#file-input").show();
});

$(".cancel_feed_btn").click(function() {
  var modWidth = "87.5%";
  $(".add_feed").css("height", 64);
  $("#add_feed_heading").hide();
  $("#add_feed_heading").width( modWidth );
  $("#write_down").width( modWidth );
  $(".add_feed_btn").css("top", 13);
  $(".cancel_feed_btn").css("top", 13);
  $(".cancel_feed_btn").hide();
  $("#file-input").hide();
  $("#write_down").val('');
  $("#add_feed_heading").val('');
  $("#file-input").val('');
});

document.getElementById('file-input').onchange = function (e) {
    loadImage(
        e.target.files[0],
        function (img) {
            document.body.appendChild(img);
        }
    );
};