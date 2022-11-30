export let AddTask: any = function (this:any) {
    this.newTask = function (projectContainer: HTMLDivElement) {
        let containerTask: HTMLDivElement = document.createElement('div') as HTMLDivElement;

        containerTask.className = 'containerTask';
        projectContainer.appendChild(containerTask);

    }
}
