let Options = {
  placeholder: "زمان یادآوری",
  twodigit: true,
  closeAfterSelect: false,
  buttonsColor: "#bee4d1",
  forceFarsiDigits: true,
  markToday: true,
  highlightSelectedDay: true,
  gotoToday: true,
};
kamaDatepicker("dates", Options);
function setAlarm() {
    const times = document.querySelector("#dates").value;
    if (times) {
        const parts = times.split("/");
        if (parts.length === 3) {
            const year = parseInt(parts[0]);
            const month = parseInt(parts[1]) - 1;
            const day = parseInt(parts[2]);
            if (!isNaN(year) && !isNaN(month) && !isNaN(day)) {
                if (year >= 1300 && year <= 1500 && month >= 0 && month <= 11 && day >= 1 && day <= 31) {
                    const alarmDate = new Date(year, month, day);
                    const now = new Date();
                    const timeDiff = Math.abs(alarmDate.getTime() - now.getTime());
                    if (timeDiff > 0) {
                        setTimeout(() => {
                            alert(
                                "جهت یادآوری دارو لطفا به بخش یادوری و پنل خود مراجعه فرمائید."
                            );
                        }, timeDiff);
                        console.log("هشدار تنظیم شد.");
                        alert("هشدار با موفقیت تنظیم شد."); // نمایش پیام موفقیت
                    } else {
                        console.log("تاریخ وارد شده معتبر نیست.");
                        alert("تاریخ وارد شده معتبر نیست.");
                    }
                } else {
                    console.log("تاریخ وارد شده معتبر نیست.");
                    alert("تاریخ وارد شده معتبر نیست.");
                }
            } else {
                console.log("فرمت تاریخ وارد شده صحیح نیست.");
                alert("فرمت تاریخ وارد شده صحیح نیست.");
            }
        } else {
            console.log("فرمت تاریخ وارد شده صحیح نیست.");
            alert("فرمت تاریخ وارد شده صحیح نیست.");
        }
    } else {
        console.log("لطفا تاریخ را وارد کنید.");
        alert("لطفا تاریخ را وارد کنید.");
    }
}
const setAlarmButton = document.querySelector(".setAlarmButton");
if (setAlarmButton) {
    setAlarmButton.addEventListener("click", setAlarm);
}
