</body>
<script>
        let newNoteBtn = document.getElementById('newNoteBtn')
        newNoteBtn.addEventListener('click', e => {
            let note = document.querySelector('#newNote')
            console.log(note)

            if(!note.value){
                return
            }

            let header = new Headers();
            header.append('Content-Type', 'application/x-www-form-urlencoded')
            fetch('/insert-note', {
                method : 'POST',
                headers: header,
                body: JSON.stringify({'newNote' : note.value})
            })
            .then( response => {
                console.log('Resposta1:')
                console.log(response)
                return response.json()
            })
            .then(responseJSON => {
                console.log('Response')
                console.log(responseJSON)

                let notes = document.querySelector('#notes')
                insertedContent = 
                    `<div class="d-flex justify-content-between list-group-item">
                        <p> ${responseJSON.content} </p>
                        <div>
                            <button class="btn btn-warning" ${responseJSON.id}>Edit</button>
                            <button class="btn btn-danger" onclick="deleteNote(this)" data-item = ${responseJSON.id}>Delete</button>
                        </div>
                    </div>`
                notes.innerHTML += insertedContent;
                note.value = ''
            })
            .catch(e => console.log('Erro: ' + e))
        })

        
        function deleteNote(e) {
                let parent = e.parentNode.parentNode;
                let item = e.dataset.item;
                let header = new Headers()
                header.append('Content-Type', 'application/x-www-form-urlencoded')

                fetch('/delete-note', {
                    method: 'DELETE',
                    headers: header,
                    body: JSON.stringify({id : item})
                })
                .then(response => response.text())
                .then(response => {
                    console.log(response)
                    parent.parentNode.removeChild(parent)
                }) 
        }
    </script>
</html>