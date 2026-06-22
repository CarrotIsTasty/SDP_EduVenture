const canvas = document.querySelector('canvas')
const c = canvas.getContext('2d')

canvas.width = window.innerWidth
canvas.height = window.innerHeight

const urlParams = new URLSearchParams(window.location.search);
let TopicNum = urlParams.get('topic_id');

const collisionsMap = []

for (let i = 0; i < collisions.length; i+= 15) {
    collisionsMap.push(collisions.slice(i, 15 + i))
}

const characterBox = []

for (let i = 0; i < characterBoxData.length; i+= 15) {
    characterBox.push(characterBoxData.slice(i, 15 + i))
}

const boundaries = []

window.addEventListener('resize', () => {
    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    offset = calculateOffset();
});


const mapWidth = collisionsMap[0].length * Boundary.width;
const mapHeight = collisionsMap.length * Boundary.height;

function calculateOffset() {
    return {
        x: (canvas.width - mapWidth) / 2,
        y: (canvas.height - mapHeight) / 2 - 400
    };
}

let offset = calculateOffset();

collisionsMap.forEach((row, i) => {
    row.forEach((symbol, j) => {
        if (symbol === 1840) {
            boundaries.push(
                new Boundary({
                    position: {
                        x: j * Boundary.width + offset.x,
                        y: i * Boundary.height + offset.y
                    }
                })
            );
        }
    });
});

const characterRadius =[]

characterBox.forEach((row, i) => {
    row.forEach((symbol, j) => {
        if (symbol === 1840) {
            characterRadius.push(
                new Boundary({
                    position: {
                        x: j * Boundary.width + offset.x,
                        y: i * Boundary.height + offset.y
                    }
                })
            );
        }
    });
});

const image = new Image()
image.src = 'img/pokemoninterior.png'

const playerUpImage = new Image()
playerUpImage.src = 'img/ashup.png'

const playerLeftImage = new Image()
playerLeftImage.src = 'img/ashleft.png'

const playerDownImage = new Image()
playerDownImage.src = 'img/ashdown.png'

const playerRightImage = new Image()
playerRightImage.src = 'img/ashright.png'

const player = new Sprite({
    position: {
        x: canvas.width / 2 - 880 / 5 / 2,
        y: canvas.height / 2 - 176 / 2
    },
    image: playerDownImage,
    frames: {
        max:5
    },
    sprites: {
        up: playerUpImage,
        left: playerLeftImage,
        down: playerDownImage,
        right: playerRightImage,
    }
});

const background = new Sprite({
    position: {
        x: offset.x,
        y: offset.y
    },
    image: image
});

const dialogues = {
    1: dialogueData1,
    2: dialogueData2,
    3: dialogueData3,
    4: dialogueData4,
    5: dialogueData5,
    6: dialogueData6,
    7: dialogueData7,
    8: dialogueData8,
};

function chooseOption(next) {
    const dialogueText = document.getElementById('dialogue-text');
    const optionsBox = document.querySelector('.options-box');
    const dialogueSelect = dialogues[TopicNum];
    const dialogue = dialogueSelect[next]
    dialogueText.innerHTML = dialogue.text;
    optionsBox.innerHTML = '';

    dialogue.options.forEach(option => {
        const button = document.createElement('button');
        button.textContent = option.text;
        button.onclick = () => {
            const topicId = TopicNum;
            if(option.next.endsWith('.html')) {
                window.location.href = `${option.next}?topic_id=${topicId}`;
            }
            else chooseOption(option.next);
        }
        optionsBox.appendChild(button);
    });
}

chooseOption('initial');

function displayDialogue(active) {
    const dialogue = document.getElementById('dialogue-container');
    if (active) {
        dialogue.style.display = 'block'
        showEIndicator(false);
    }
    else if(!active) {
        dialogue.style.display = 'none'
        chooseOption('initial');
    }
}



const keys = {
    w: { pressed: false },
    a: { pressed: false },
    s: { pressed: false },
    d: { pressed: false },
    e: { pressed: false }
};

const keyStack = [];

const movables = [background, ...boundaries, ...characterRadius]

function rectangularCollision ({playerRectangle, boundaryRectangle}) {
    return (
        playerRectangle.position.x - 35 + player.width >= boundaryRectangle.position.x && 
        playerRectangle.position.x + 35 <= boundaryRectangle.position.x + boundaryRectangle.width &&
        playerRectangle.position.y + 100 <= boundaryRectangle.position.y + boundaryRectangle.height &&
        playerRectangle.position.y - 7 + player.height >= boundaryRectangle.position.y
    )
};

function moveDirection(up, left, down, right) {
    movingup = up
    movingleft = left
    movingdown = down
    movingright = right
};

let interacting = false

const eIndicator = document.getElementById('e-indicator');

function animate() {
    window.requestAnimationFrame(animate);
    background.draw();
    boundaries.forEach(boundary => {
        boundary.draw()
    })
    characterRadius.forEach(radius => {
        radius.draw()
    })
    player.draw()
    moveDirection(true, true, true, true)
    player.moving = false

    let newInteracting = false;

    for (let i = 0; i < characterRadius.length; i++) {
        const radius = characterRadius[i];
        if (
          rectangularCollision({
            playerRectangle: player,
            boundaryRectangle: radius
          })
        ) {
            newInteracting = true;
            break;
        }
    }

    if (newInteracting !== interacting) {
        interacting = newInteracting;
        if (interacting) {
            console.log('interacting')
            displayDialogue(false)
            showEIndicator(true)
        } else {
            console.log('out')
            displayDialogue(false)
            showEIndicator(false)
        }
    }

    if (keyStack.length > 0) {
        const lastKey = keyStack[keyStack.length - 1];
        if (lastKey === 'w') {
            player.moving = true
            player.image = player.sprites.up
            for (let i = 0; i < boundaries.length; i++) {
                const boundary = boundaries[i]
                if (
                  rectangularCollision({
                    playerRectangle: player,
                    boundaryRectangle: {
                        ...boundary,
                        position: {
                            x: boundary.position.x,
                            y: boundary.position.y + 3
                        }
                    }
                  })
                ) {
                    movingup = false
                    break
                }
            }
            if (movingup){
                movables.forEach((movable) => {
                movable.position.y += 3
            })}
        }
        if (lastKey === 'a') {
            player.moving = true
            player.image = player.sprites.left
            for (let i = 0; i < boundaries.length; i++) {
                const boundary = boundaries[i]
                if (
                  rectangularCollision({
                    playerRectangle: player,
                    boundaryRectangle: {
                        ...boundary,
                        position: {
                            x: boundary.position.x + 3,
                            y: boundary.position.y
                        }
                    }
                  })
                ) {
                    movingleft = false
                    break
                }
            }
            if (movingleft){
                movables.forEach((movable) => {
                movable.position.x += 3
            })}
        }
        if (lastKey === 's') {
            player.moving = true
            player.image = player.sprites.down
            for (let i = 0; i < boundaries.length; i++) {
                const boundary = boundaries[i]
                if (
                  rectangularCollision({
                    playerRectangle: player,
                    boundaryRectangle: {
                        ...boundary,
                        position: {
                            x: boundary.position.x,
                            y: boundary.position.y - 3
                        }
                    }
                  })
                ) {
                    movingdown = false
                    break
                }
            }
            if (movingdown){
            movables.forEach((movable) => {
            movable.position.y -= 3
        })}
        }
        if (lastKey === 'd') {
            player.moving = true
            player.image = player.sprites.right
            for (let i = 0; i < boundaries.length; i++) {
                const boundary = boundaries[i]
                if (
                  rectangularCollision({
                    playerRectangle: player,
                    boundaryRectangle: {
                        ...boundary,
                        position: {
                            x: boundary.position.x - 3,
                            y: boundary.position.y
                        }
                    }
                  })
                ) {
                    movingright = false
                    break
                }
            }
            if (movingright){
                movables.forEach((movable) => {
                movable.position.x -= 3
            })}
        }
    }
}

function showEIndicator(show) {
    eIndicator.style.display = show ? 'block' : 'none';
}

animate();

function addKeyToStack(key) {
    if (!keyStack.includes(key)) {
        keyStack.push(key);
    }
}

function removeKeyFromStack(key) {
    const index = keyStack.indexOf(key);
    if (index > -1) {
        keyStack.splice(index, 1);
    }
}

window.addEventListener('keydown', (e) => {
    switch (e.key) {
        case 'w':
            keys.w.pressed = true;
            addKeyToStack('w');
            break;
        case 'a':
            keys.a.pressed = true;
            addKeyToStack('a');
            break;
        case 's':
            keys.s.pressed = true;
            addKeyToStack('s');
            break;
        case 'd':
            keys.d.pressed = true;
            addKeyToStack('d');
            break;
        case 'e':
            keys.e.pressed = true;
            if (interacting) {
                displayDialogue(true);
                console.log('interacting and e pressed');
            }
            break;
    }
});

window.addEventListener('keyup', (e) => {
    switch (e.key) {
        case 'w':
            keys.w.pressed = false;
            removeKeyFromStack('w');
            break;
        case 'a':
            keys.a.pressed = false;
            removeKeyFromStack('a');
            break;
        case 's':
            keys.s.pressed = false;
            removeKeyFromStack('s');
            break;
        case 'd':
            keys.d.pressed = false;
            removeKeyFromStack('d');
            break;
        case 'e':
            keys.e.pressed = false;
            break;
    }
});
