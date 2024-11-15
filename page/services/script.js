let activeContent = '';

function toggleContent(contentId) {
    const content = document.getElementById(contentId);
    
    if (activeContent === contentId) {
        content.style.display = 'none';
        activeContent = '';
    } else {
        if (activeContent !== '') {
            document.getElementById(activeContent).style.display = 'none';
        }
        content.style.display = 'block';
        activeContent = contentId;
    }
}
