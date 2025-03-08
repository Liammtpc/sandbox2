function submits() {
  let name = document.querySelector("#name").value;
  let email = document.querySelector("#email").value;
  let pass = document.querySelector("#password").value;
  let rpass = document.querySelector("#rpassword").value;
  let errors = document.querySelector(".errors");
  if (name == "") {
    errors.innerHTML = "!نام کاربری خالی است";
    return false;
  }
  if (email == "") {
    errors.innerHTML = "!ایمیل خالی است";
    return false;
  }
  if (email.indexOf("@") <= 0) {
    errors.innerHTML = "!ایمیل اشتباه وارد کردید";
    return false;
  }
  if (
    email.charAt(email.length - 4) != "." &&
    email.charAt(email.length - 3) != "."
  ) {
    errors.innerHTML = "!ایمیل اشتباه وارد شده است";
    return false;
  }
  if (pass == "") {
    errors.innerHTML = "!رمز خود را وارد کنید ";
    return false;
  }
  if (pass.length > 8) {
    document.getElementById("errorpass").innerHTML =
      "!تعداد بیش از حد مجاز وارد شده است";
    return false;
  }
  if (rpass == "") {
    errors.innerHTML = "!رمز خود را وارد کنید ";
    return false;
  }
  if (rpass != pass) {
    errors.innerHTML = "!رمز وارد شده با هم مغایرت دارد ";
    return false;
  }
}
