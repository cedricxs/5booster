function addTitle(text) {
    var header = document.getElementById('top_left')
    var title = document.createElement('span');
    title.textContent = '>>> '+text
    header.appendChild(title)
}
