import * as stream from "stream";

let container:HTMLDivElement = document.getElementById('container') as HTMLDivElement;

interface ProjectInterface {
    title:string,
    timeGlobal: typeof setInterval,
    calendar: Date,
    task: string,
    stopWatch: typeof setInterval
}

let Project:  ProjectInterface = {
let containerProject: HTMLDivElement = document.createElement('div')  as HTMLDivElement;
let button: HTMLButtonElement = document.createElement('button') as HTMLButtonElement;
button.innerText = 'Créer un projet';

container.appendChild(containerProject);
containerProject.appendChild(button);
containerProject.style.border = '1px solid red';

button.addEventListener('click', function () {
    let project: HTMLDivElement = document.createElement('div') as HTMLDivElement;
    containerProject.appendChild(project);
    project.style.border = '1px solid black';
    project.style.height = "200vh";
    let title = document.createElement('h1') as HTMLElement;



})
}
