const element = document.getElementById('rich');

const rich = new DevExpress.RichEdit.RichEdit(element, {
  height: '80vh',
  unit: 0,
  onSaving: () => { alert('Saved'); },
  ribbonSettings: {
    activeTabIndex: 1 
  },
  //onDocumentLoaded: function(s) { s.setFullScreenMode(true); }
});