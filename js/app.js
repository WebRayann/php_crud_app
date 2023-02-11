const body = document.querySelector('body')

document.querySelector('#radioButton').addEventListener('change',(e) =>{
    if(e.target.value == 'on'){
        const newInput = document.createElement('input')
        newInput.classList.add('form-control')
        body.appendChild(newInput);
        
    }
})