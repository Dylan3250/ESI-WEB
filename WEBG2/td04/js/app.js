function separatedByParity(tab) {
    for (let i = 0; i < tab.length; i++) {
        if (tab[i] % 2 == 0) {
            tab.unshift(tab[i]);
            tab.splice(i + 1, 1);
        }
    }
}

function defineValuePosition(tab, nb) {
    tab[nb] = nb;
}

function addMultipleNb(tab, pos, val, nb) {
    let duplicateTab = new Array(nb);
    duplicateTab.fill(val, 0, nb);
    tab.splice(pos, 0, ...duplicateTab);
}

function doOnArray(tab, power) {
    for (let i = 0; i < tab.length; i++) {
        tab[i] = power(tab[i]);
    }
}
// doOnArray(tab, power => power ** 2);

function checkArguments() {
    let returnValue;

    if (arguments.length == 1) {
        if (arguments[0] > 0) {
            returnValue = Math.sqrt(arguments[0]);
        } else {
            returnValue = undefined;
        }
    } else if (arguments.length == 2) {
        if (arguments[0] > arguments[1]) {
            returnValue = arguments[0];
        } else {
            returnValue = arguments[1];
        }
    } else {
        if (arguments[1] < arguments[2] && arguments[1] > arguments[0]
            || arguments[2] < arguments[1] && arguments[1] < arguments[0]) {
            returnValue = true;
        } else {
            returnValue = false;
        }
    }

    return returnValue;
}

function dynamicCall() {
    let returnTab = [];
    
    tab.forEach(item => {
        if (typeof item === "function") {
            returnTab.push(item());
        }
    })

    return returnTab;
}

function sumLine(array, line) {
    let sum = 0;
    array[line].forEach(col => sum += col);
    return sum;
}

function sumColumn(array, col) {
    let sum = 0;
    array.forEach(lg => sum += lg[col]);
    return sum;
}

function sumDiag(array, number) {
    let sum = 0;

    if (number == 1) {
        for (let i = 0; i < array.length; i++) {
            sum += array[i][i];
        }
    } else if (number == 2) {
        for (let i = array.length - 1; i >= 0; i--) {
            sum += array[i][i];
        }
    }
    return sum;
}

function isMagicSquare(array) {
    isMagic = sumDiag(array, 1) == sumDiag(array, 2);

    i = 0;
    while (i < array.length && isMagic) {
        j = 0;
        while (j < array.length && isMagic) {
            isMagic = sumColumn(array, j) == sumLine(array, i) == isMagic;
            j++;
        }
        i++;
    }
    return isMagic;
}

// let carre = [
//     [4, 9, 2],
//     [3, 5, 7],
//     [8, 1, 6]
// ];
// console.log(isMagicSquare(carre));