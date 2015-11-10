        
        function initPosition(textBox) {
            var storedValue = textBox.value;
            textBox.value = "";
            textBox.select();
            var caretPos = document.selection.createRange();
            textBox.__boundingTop = caretPos.boundingTop;
            textBox.__boundingLeft = caretPos.boundingLeft;
            textBox.value = " ";
            textBox.select();
            caretPos = document.selection.createRange();
            textBox.__boundingWidth = caretPos.boundingWidth;
            textBox.__boundingHeight = caretPos.boundingHeight;
            textBox.value = storedValue;
        }
        function storePosition(textBox) {
            var caretPos = document.selection.createRange();
            var boundingTop = (caretPos.offsetTop + textBox.scrollTop) - textBox.__boundingTop;
            var boundingLeft = (caretPos.offsetLeft + textBox.scrollLeft) - textBox.__boundingLeft;

            textBox.__Line = (boundingTop / textBox.__boundingHeight) + 1;
            textBox.__Column = (boundingLeft / textBox.__boundingWidth) + 1;
        } 
        function updatePositionTxt(textBox) {
            storePosition(textBox);
            document.forms[0].txtLine.value = textBox.__Line;
            document.forms[0].txtColumn.value = textBox.__Column;
        }