<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spul inventaris</title>
</head>

<body>
    <div>
        <script>
            function getWeekNumber(date) {
                const d = new Date(date);
                d.setHours(0, 0, 0, 0);
                d.setDate(d.getDate() + 3 - (d.getDay() + 6) % 7);
                const week1 = new Date(d.getFullYear(), 0, 4);
                return 1 + Math.round(((d - week1) / 86400000 - 3 + (week1.getDay() + 6) % 7) / 7);
            }

            function updateTime() {
                const now = new Date();
                const dayOfWeek = now.getDay();
                const hours = now.getHours();
                const minutes = now.getMinutes();
                const seconds = now.getSeconds();

                // clock existance check
                console.log(`dayOfWeek: ${dayOfWeek}, hours: ${hours}, minutes: ${minutes}, seconds: ${seconds}`);

                if (dayOfWeek === 5 && hours === 16 && minutes === 30 && seconds === 0) {
                    const day = now.getDay();
                    const week = getWeekNumber(now)
                    const month = now.getMonth();
                    console.log("Opening excel.php");
                    openInIframe(`excelOutput/excel.php?day=${day}&week=${week}&month=${month}`, "_blank");
                }
            }
            updateTime();
            setInterval(updateTime, 1000);
        </script>
    </div>
</body>

</html>