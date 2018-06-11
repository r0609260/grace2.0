var font = sessionStorage.getItem("fontSize");
if (font !== null) {
    font = parseInt(font);
    less.modifyVars({'@font_size': font + 'px'});
    less.refreshStyles();
} else
    font = 0;
var incBtn;
var decBtn;

window.onload = function () {
    incBtn = document.getElementById("BG");
    incBtn.addEventListener('click', incFontSize);
    decBtn = document.getElementById("BS");
    decBtn.addEventListener('click', decFontSize);    
    disableButtons();
};


function incFontSize() {
    font = font + 2;
    less.modifyVars({'@font_size': font + 'px'});
    less.refreshStyles();
    storeFont();
}

function decFontSize() {
    font = font - 2;
    less.modifyVars({'@font_size': font + 'px'});
    less.refreshStyles();
    storeFont();
}

function storeFont() {
    sessionStorage.setItem("fontSize", font);
    disableButtons();
}

function disableButtons() {
    if (font >= 6)
    {
        $("#BG").attr('disabled', 'disabled');
        $("#BG").AddClass("notactive"); //needed for disabling button           
    } else
    {
        $("#BS").removeAttr('disabled');
    }

    if (font <= -6)
    {
        $("#BS").attr('disabled', 'disabled');
    } else
    {
        $("#BG").removeAttr('disabled');
    }
}