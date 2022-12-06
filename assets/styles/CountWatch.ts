export const CountWatch: any = function (this:any, textTime:HTMLElement, time:HTMLElement, timeStop:HTMLElement, ) {
    let hours :number = 0;
    let minutes : number = 0;
    let seconds : number = 0;
    let timeWatch: string | number | NodeJS.Timer | undefined;

    if (time) {
        time.addEventListener('click', ()=> {
            timeWatch = setInterval(this.counterWatch = ()=> {
                hours = parseInt(String(hours));
                minutes = parseInt(String(minutes));
                seconds = parseInt(String(seconds));

                seconds++;

                if (seconds == 60) {
                    minutes++;
                    seconds = 0;
                }
                if (minutes ==60) {
                    hours++;
                    minutes = 0;
                }

                textTime.innerHTML = `${hours} : ${minutes} : ${seconds}`;
            },1000);
        })
    }
    if (timeStop) {
        timeStop.addEventListener('click', ()=> {
            clearInterval(timeWatch);
        })
    }
}