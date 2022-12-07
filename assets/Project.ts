import {container, header} from "./recuperation";
import {AddTask} from "./Tasks";

export let AddProject: any = function (this: any, textTime:HTMLElement) {
    this.display = function () {
        let containerProject: HTMLDivElement = document.createElement('div')  as HTMLDivElement;
        let button: HTMLButtonElement = document.createElement('button') as HTMLButtonElement;
        button.innerText = 'Créer un projet';

        container.appendChild(containerProject);
        header.appendChild(button);

        containerProject.className = 'containerProject';
        button.className = 'buttonCreateProject';

        button.addEventListener('click', function () {
            let project: HTMLDivElement = document.createElement('div') as HTMLDivElement;
            let title: HTMLElement = document.createElement('h1') as HTMLElement;
            let input:HTMLInputElement = document.createElement('input') as HTMLInputElement;
            let buttonValidate: HTMLButtonElement = document.createElement('button') as HTMLButtonElement;

            buttonValidate.innerText = 'Valider';

            containerProject.appendChild(project);
            project.appendChild(title);
            project.appendChild(input);
            project.appendChild(buttonValidate);

            buttonValidate.addEventListener('click', ()=> {
                let valueTitle: string = input.value;
                title.innerHTML = valueTitle.toString();

                input.style.display = 'none';
                buttonValidate.style.display = 'none';

                let divItems: HTMLDivElement = document.createElement('div') as HTMLDivElement;
                let iconItem: HTMLElement = document.createElement('i') as HTMLElement;
                let textTime : HTMLElement = document.createElement('p') as HTMLElement;
                let iconItem2: HTMLElement = document.createElement('i') as HTMLElement;
                let divBottom: HTMLElement = document.createElement('div') as HTMLDivElement;
                let link: HTMLAnchorElement = document.createElement('a') ;
                let clearAll: HTMLElement = document.createElement('i') as HTMLElement;
                let view: HTMLElement = document.createElement('i') as HTMLElement;
                let addTask: HTMLButtonElement = document.createElement('button') as HTMLButtonElement;
                let containerTask: HTMLDivElement = document.createElement('div') as HTMLDivElement;

                containerTask.className = 'containerTask';
                textTime.className = 'textTime';

                addTask.innerHTML = '+ Ajouter une tâche';
                textTime.innerHTML = '00.00.00';
                textTime.style.fontSize = '1.3rem';
                textTime.style.fontWeight = 'bold';

                project.appendChild(divItems);
                divItems.appendChild(iconItem);
                divItems.appendChild(textTime);
                divItems.appendChild(iconItem2);
                divItems.appendChild(divBottom);
                divBottom.appendChild(clearAll);
                divBottom.appendChild(link);
                link.appendChild(view);
                divBottom.appendChild(addTask);

                clearAll.addEventListener("click", ()=> {
                    project.remove();
                })

                addTask.addEventListener('click', function () {
                    let writteTask: any = new AddTask(containerTask, textTime);
                    writteTask.inputTask(project);
                })

                divItems.className = 'divItems';
                iconItem.className = 'fa-regular fa-clock';
                iconItem2.className = 'fa-solid fa-calendar-days';
                divBottom.className = 'divBottom';
                clearAll.className = 'fa-solid fa-trash-can';
                view.className = 'fa-solid fa-eye';
                addTask.className = 'addTask';

                link.href = "detailsProject.html";
            })

            project.className = 'divProject';
            title.className = 'title';
            input.className = 'inputTitle';
            buttonValidate.className = 'buttonValidate';

        })
    }
}
