export let AddTask: any = function (this:any) {
    this.inputTask = function (projectContainer : HTMLDivElement) {
        let containerTask: HTMLDivElement = document.createElement('div') as HTMLDivElement;
        containerTask.className = 'containerTask';
        let divTask : HTMLDivElement = document.createElement('div') as HTMLDivElement;
        let taskInput : HTMLInputElement = document.createElement('input') as HTMLInputElement;

        projectContainer.appendChild(containerTask);

        divTask.className = 'divTask';
        taskInput.className = 'inputTask';

        containerTask.appendChild(divTask);
        divTask.appendChild(taskInput);

        let validTask: HTMLButtonElement = document.createElement('button') as HTMLButtonElement;
        validTask.innerHTML = 'Valider';
        validTask.className = 'validTask';

        validTask.addEventListener('click', ()=> {
            taskInput.remove();
            validTask.remove();

            let contentInput = taskInput.value;
            divTask.innerHTML += contentInput.toString();
            divTask.style.borderBottom = '1px dashed black';

            let time : HTMLElement = document.createElement('i') as HTMLElement;
            let timeStop : HTMLElement = document.createElement('i') as HTMLElement;

            time.className = 'fa-solid fa-stopwatch';
            timeStop.className = 'fa-solid fa-stopwatch';
            timeStop.style.color = 'red';

            divTask.appendChild(time);
            divTask.appendChild(timeStop);

            if (time) {
                time.addEventListener('click',()=> {
                    console.log('test');
                })
            }
        })

        divTask.appendChild(validTask);
    }
}
