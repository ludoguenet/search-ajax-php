const xml = new XMLHttpRequest()
const form = document.querySelector('#myForm')
const query = document.querySelector('#mySearch')
const url = "http://127.0.0.1/mynewproject/posts"

form.addEventListener('submit', function (e) {
    e.preventDefault()
    xml.onreadystatechange = function () {
        if (xml.readyState === 4) {
            if (xml.status === 200) {
                const results = JSON.parse(xml.responseText)
                let div = document.querySelector('#results')
                div.innerHTML = '';
                for (let i = 0; i < results.length; i++) {
                    let h4 = document.createElement('h4')
                    let p = document.createElement('p')
                    h4.innerHTML = results[i].title
                    p.innerHTML = results[i].content
                    div.appendChild(h4)
                    div.appendChild(p)
                }
            }
        }
    }
    xml.open('GET', url + '?q=' + query.value, true)
    xml.setRequestHeader('X-Requested-With', 'xmlhttprequest')
    xml.send()
})