<ul id="myList">
    <li>One</li>
    <li>Two</li>
    <li>Three</li>
    <li>Four</li>
    <li>Five</li>
    <li>Six</li>
    <li>Seven</li>
    <li>Eight</li>
    <li>Nine</li>
    <li>Ten</li>
    <li>Eleven</li>
    <li>Twelve</li>
    <li>Thirteen</li>
    <li>Fourteen</li>
    <li>Fifteen</li>
    <li>Sixteen</li>
    <li>Seventeen</li>
    <li>Eighteen</li>
    <li>Nineteen</li>
    <li>Twenty one</li>
    <li>Twenty two</li>
    <li>Twenty three</li>
    <li>Twenty four</li>
    <li>Twenty five</li>
</ul>
<div id="loadMore">Load more</div>
<div id="showLess">Show less</div>
<script>

$(document).ready(function () {
    size_li = $("#myList li").size();
    x=3;
    $('#myList li:lt('+x+')').show();
  $('#loadMore').click(function () {
 $('#myList li,#showLess').show();
 $('#loadMore').hide();
});
$('#showLess').click(function () {
  $('#myList li:gt('+x+'),#showLess').hide();
  $('#loadMore').show();
});
});
</script>

<?php
require'footer.php';
?>

