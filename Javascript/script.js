window.addEventListener("scroll", () => {
  const currentScrollTops =
    window.pageYOffset || document.documentElement.scrollTop;
  const abutUs = document.querySelector(".abutUs");
  if (currentScrollTops > 50) {
    abutUs.style.right = 0;
    abutUs.style.position = "relative";
  }
});
window.addEventListener("scroll", () => {
  const currentScrollTops =
    window.pageYOffset || document.documentElement.scrollTop;
  const service = document.querySelector(".service");
  if (currentScrollTops > 850) {
    service.style.left = 0;
    service.style.position = "relative";
  }
});
window.addEventListener("scroll", () => {
  const currentScrollTops =
    window.pageYOffset || document.documentElement.scrollTop;
  const banners = document.querySelector(".banners");
  if (currentScrollTops > 1000) {
    banners.style.right = 0;
    banners.style.position = "relative";
  }
});
window.addEventListener("scroll", () => {
  const currentScrollTops =
    window.pageYOffset || document.documentElement.scrollTop;
  const opinins = document.querySelector(".opinins");
  if (currentScrollTops > 1400) {
    opinins.style.left = 0;
    opinins.style.position = "relative";
  }
});

window.addEventListener("load", () => {
  if (!("Notification" in window)) {
    alert("این بروزر از نوتیفکیشن استفاده نمی کند.");
    return;
  }
  Notification.requestPermission().then((permission) => {
    if (permission === "granted") {
      var options = {
        icon: "Picture/user.png",
        body: "قرص خود را الان بخورید جهت اطلاع وارد پنل کاربری خود شوید.",
      };
      var notify = new Notification("یادآوری", options);
    } else {
      alert("اجازه نمایش نوتیفکبشن را بدهید.");
    }
  });
});
