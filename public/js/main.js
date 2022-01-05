
function afficherMasquer($id){
    if(document.getElementById($id).classList.contains('hide')){
        document.getElementById($id).classList.remove('hide');
    }else{
        document.getElementById($id).classList.add('hide');
    }
}


window.addEventListener('DOMContentLoaded', function(){

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
        let addColletionButton = document.getElementById('addColletionButton');
        
        addColletionButton.addEventListener('click', () => {
            afficherMasquer('divFormCollection');
        });
        

        document.getElementById('id_manga').addEventListener('change', ()=>{
            let select = document.getElementById('id_manga');
            let optionName = select.options[select.selectedIndex].text;
            let optionImage = select.options[select.selectedIndex].getAttribute('date-post-image');

            document.querySelector('[name=name]').value = optionName;
            document.querySelector('[name=image]').value = optionImage;
        });

        let tabCollection = document.querySelectorAll('.updateCollection');
        tabCollection.forEach(element => {
            element.addEventListener('click', () => {

                let idCollection = element.getAttribute('data-post-id');
                document.getElementById('idCollection').value = idCollection;
                
                let nameCollection = element.getAttribute('data-post-name');
                document.getElementById('titleModalUpdate').innerHTML = "Modifier collection : "+nameCollection;
                document.getElementById('updateName').value = element.getAttribute('data-post-name');
               
                document.getElementById('updateImage').value = element.getAttribute('data-post-image');
                document.getElementById('updateDescription').value = element.getAttribute('data-post-description');
                afficherMasquer('divFormUpdate');
                
                
            });
        });

        let tabDeleteCollection = document.querySelectorAll('.deleteCollection');
        tabDeleteCollection.forEach(element => {
            element.addEventListener('click', () => {
                let idCollection = element.getAttribute('data-post-id');

                let nameCollection = element.getAttribute('data-post-name');
                document.getElementById('titleModalDelete').innerHTML = "Supprimer collection : "+nameCollection;
                document.getElementById('idCollectionDelete').value = idCollection;
                afficherMasquer('divFormDelete');
                
            });
        });
        document.querySelector('.closeFormUpdate').addEventListener('click', ()=>{
            afficherMasquer('divFormUpdate');
        });

        document.querySelector('.closeFormCollection').addEventListener('click', ()=>{
            afficherMasquer('divFormCollection');
        });

        document.querySelector('.closeFormDelete').addEventListener('click', ()=>{
            afficherMasquer('divFormDelete');
        });
    }

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

    // async function displayCollectionData(id){
    //     const url = "/public/json/json.php?id_manga="+id;
    //     await fetch(url)
    //     .then(response => response.json())
    //         .then(response =>{
    //             console.log(response);
    //             const json = JSON.stringify(response);
    //             console.log(json);
    //             const obj = JSON.parse(json);
    //             console.log(obj);
    //         })
    //         .catch(error => {
    //             console.log(error);            
    //         });
    // }

    let buttonMangaDetails = document.querySelectorAll('.moreInfoManga');
    if(buttonMangaDetails.length > 0 ){
        buttonMangaDetails.forEach(element =>{
            element.addEventListener('click', ()=>{
                console.log(element.getAttribute('data-post-id'));
                afficherMasquer('divMangaDetails'+element.getAttribute('data-post-id'));
            });
        })
    }
   
    
    
    
});