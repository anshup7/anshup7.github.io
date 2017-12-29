const mq = window.matchMedia( "(max-width: 801px)" );
var text_col = "";
if (mq.matches) {
    text_col = document.getElementById("update-text-col");
    text_col.class.value = "col-md-12 col-sm-12 col-xs-12";
} else {
  text_col.class.value = "col-md-6 col-sm-6 col-xs-6";
}