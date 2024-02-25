function yesAnswerBtn() {
  alert("شكرا لابداء رأيك، نسعى لخدمتكم");
}
    function noAnswerBtn () {
  alert("يؤسفنا هذا! الرجاء التواصل معنا لتحديد كيف نخدمك");
}

var block = document.getElementsByClassName("Q");
var i;
for (i = 0; i < block.length; i++) {
    block[i].addEventListener("click", function () {
        
        this.classList.toggle("active");

        var answer = this.nextElementSibling;
        if (answer.style.display === "block") {
            answer.style.display = "none";
        } else {
            answer.style.display = "block";
        }
    }
    );
}