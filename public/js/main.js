
// Fonction pour afficher/Masque une section
function afficherMasquer($id){
    if(document.getElementById($id).classList.contains('hide')){
        document.getElementById($id).classList.remove('hide');
    }else{
        document.getElementById($id).classList.add('hide');
    }
}

// Fonction pour récupérer les informations de chaque collection en JSON
async function display_data(id_collection){
    const url = "/public/json/json.php?ID="+id_collection;
    await fetch(url)
    .then(response => response.json())
        .then(response =>{
            const json = JSON.stringify(response);
            const obj = JSON.parse(json);
            document.getElementById('titleModalUpdate').innerHTML = "Modifier collection : "+obj.name;
            document.getElementById('updateName').value = obj.name;
           
            document.getElementById('updateImage').value = obj.image;
            document.getElementById('updateDescription').value =obj.description;
        })
        .catch(error => {
            console.log(error);            
        });
}

/* Script DOM APP*/
window.addEventListener('DOMContentLoaded', function(){

    // Code pour mode nuit
    let nightMode = document.getElementById('nightMode');
    if(nightMode){
        nightMode.addEventListener('click', ()=>{
            if(document.querySelector('body').classList.contains('dark')){
                document.querySelector('body').classList.remove('dark');
            }else{
                document.querySelector('body').classList.add('dark');
            }
        })
    }
    
    // Conditions pour savoir si on est dans la page Dashboard.
    if (document.getElementById('addColletionButton') ){

        // Déclarations des variables de la page Dashboard
        let addColletionButton = document.getElementById('addColletionButton');
        let tabCollection = document.querySelectorAll('.updateCollection');
        let tabDeleteCollection = document.querySelectorAll('.deleteCollection');
        let buttonMangaDetails = document.querySelectorAll('.moreInfoManga');
        addColletionButton.addEventListener('click', () => {
            afficherMasquer('divFormCollection');
        });

        // Code pour détecter le changement du selecteur de manga
        document.getElementById('id_manga').addEventListener('change', ()=>{
            // Si un manga est sélectionné on remplit les champs, sinon les vide
            if(document.getElementById('id_manga').value != 0){
                let select = document.getElementById('id_manga');
                let optionName = select.options[select.selectedIndex].text;
                let optionImage = select.options[select.selectedIndex].getAttribute('date-post-image');
    
                document.querySelector('[name=name]').value = optionName;
                document.querySelector('[name=image]').value = optionImage;
            }else{
                document.querySelector('[name=name]').value = '';
                document.querySelector('[name=image]').value = '';
            }
            
        });

        // Code pour remplir les champs de la modal de modification de la Collection de manga
       
        tabCollection.forEach(element => {
            element.addEventListener('click', () => {

                let idCollection = element.getAttribute('data-post-id');
                document.getElementById('idCollection').value = idCollection;
                
                display_data(idCollection);

                // Ancienne méthode pour remplir les champs 
                // document.getElementById('titleModalUpdate').innerHTML = "Modifier collection : "+nameCollection;
                // document.getElementById('updateName').value = element.getAttribute('data-post-name');
               
                // document.getElementById('updateImage').value = element.getAttribute('data-post-image');
                // document.getElementById('updateDescription').value = element.getAttribute('data-post-description');
                afficherMasquer('divFormUpdate');
                
                
            });
        });

        // Code pour supprimer une collection
        tabDeleteCollection.forEach(element => {
            element.addEventListener('click', () => {
                let idCollection = element.getAttribute('data-post-id');
                console.log(idCollection);
                let nameCollection = element.getAttribute('data-post-name');
                document.getElementById('titleModalDelete').innerHTML = "Supprimer collection : "+nameCollection;
                document.getElementById('idCollectionDelete').value = idCollection;
                afficherMasquer('divFormDelete');
                
            });
        });

        // Code pour afficher/masquer divers div
        document.querySelector('.closeFormUpdate').addEventListener('click', ()=>{
            afficherMasquer('divFormUpdate');
        });

        document.querySelector('.closeFormCollection').addEventListener('click', ()=>{
            afficherMasquer('divFormCollection');
        });

        document.querySelector('.closeFormDelete').addEventListener('click', ()=>{
            afficherMasquer('divFormDelete');
        });

        // Code pour afficher les informations supplémentaires
        buttonMangaDetails.forEach(element =>{
            element.addEventListener('click', ()=>{
                console.log(element.getAttribute('data-post-id'));
                afficherMasquer('divMangaDetails'+element.getAttribute('data-post-id'));
            });
        })
        
    }


/* SCRIPT ADMIN (En développement)*/
    // Code pour rajouter un manga
    let buttonAddManga = document.querySelectorAll('.buttonAddManga');
    buttonAddManga.forEach(element => {
        element.addEventListener('click', () => {

            let idManga = element.getAttribute('data-post-id');
            document.getElementById('idManga').value = idManga;
            
            let nameManga = element.getAttribute('data-post-name');
            document.getElementById('titleModal').innerHTML = "Modifier : "+nameManga;
            document.getElementById('name').value = element.getAttribute('data-post-name');
            document.getElementById('image').value = element.getAttribute('data-post-image');
            afficherMasquer('divAddManga');
            
        });
    });
        
    let buttonDeleteManga = document.querySelectorAll('.buttonDeleteManga');
    buttonDeleteManga.forEach(element => {
        element.addEventListener('click', () => {
            let idManga = element.getAttribute('data-post-id');
            document.getElementById('idMangaDelete').value = idManga;
            
            afficherMasquer('divDeleteManga');
            
        });
    });

    if(document.querySelector('.closeAddManga') != null){
        document.querySelector('.closeAddManga').addEventListener('click', ()=>{
            afficherMasquer('divAddManga');
        });
    }

    if(document.querySelector('.closeDeleteManga') != null){
        document.querySelector('.closeDeleteManga').addEventListener('click', ()=>{
            afficherMasquer('divDeleteManga');
        });
    }
    
});