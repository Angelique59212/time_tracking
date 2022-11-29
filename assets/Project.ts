import {container, header} from "./recuperation";

export let AddProject: any = function (this: any) {
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
            })

            project.className = 'divProject';
            title.className = 'title';
            input.className = 'inputTitle';
            buttonValidate.className = 'buttonValidate';
        })

    }
}
