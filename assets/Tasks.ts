export let AddTask: any = function (this:any) {
    this.newTask = function (projectContainer: HTMLDivElement) {
        let containerTask: HTMLDivElement = document.createElement('div') as HTMLDivElement;
        containerTask.className = 'containerTask';

        projectContainer.appendChild(containerTask);

    }
    this.inputTask = function () {
        let taskContainer  = document.querySelector('.containerTask') as HTMLDivElement ;
        let divTask = document.createElement('div') as HTMLDivElement;
        let taskInput : HTMLInputElement = document.createElement('input') as HTMLInputElement;

        divTask.className = 'divTask';
        taskInput.className = 'inputTask';

        taskContainer.appendChild(divTask);
        divTask.appendChild(taskInput);

        let validTask: HTMLButtonElement = document.createElement('button') as HTMLButtonElement;
        validTask.innerHTML = 'Valider';


        validTask.addEventListener('click', ()=> {
            taskInput.remove();
            validTask.remove();

            let contentInput = taskInput.value;
            divTask.innerHTML += contentInput.toString();
            divTask.style.borderBottom = '1px dashed black';
        })

        taskContainer.appendChild(validTask);
    }
}
