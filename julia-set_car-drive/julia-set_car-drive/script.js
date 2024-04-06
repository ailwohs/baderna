const canvas = document.getElementById("myCanvas");
const gpu = new GPU.GPU();
const ctx = canvas.getContext("2d");

let x = 150, y = 200, larg = 10;

const teclas = [];
let ang = 0;

// Define the GPU.js kernel function
const drawKernel = gpu.createKernel(function(width, height, cr, ci, maxIterations) {
    const x = this.thread.x;
    const y = this.thread.y;

    const zx = 1.5 * (x - width / 2) / (0.5 * width);
    const zy = (y - height / 2) / (0.5 * height);
    
    let iterations = 0;
    
    let x0 = zx;
    let y0 = zy;

    while (iterations < maxIterations && x0 * x0 + y0 * y0 <= 4) {
        const xtemp = x0 * x0 - y0 * y0 + cr;
        y0 = 2 * x0 * y0 + ci;
        x0 = xtemp;
        iterations++;
    }

    const r = iterations === maxIterations ? 0 : iterations / 0.5 / maxIterations;
    const g = iterations === maxIterations ? 0 : iterations / 2 / maxIterations;
    const b = iterations === maxIterations ? 0 : 0.25;

    this.color(r, g, b);
})
.setOutput([canvas.width, canvas.height])
.setGraphical(true);

const renderCanvas = () => {
    const cReal = (x - (canvas.width / 2)) / (canvas.width / 4) / 2;
    const cImaginary = (y - (canvas.height / 2)) / (canvas.height / 4) / 2;

    drawKernel(canvas.width, canvas.height, cReal, cImaginary, 100);
    ctx.drawImage(drawKernel.canvas, 0, 0);

    processaTeclas();

    ctx.save();
    ctx.translate(x, y);
	ctx.rotate(ang);

    ctx.beginPath();
    ctx.arc(0, 0, larg, 0, Math.PI * 2);
    ctx.fillStyle = "#808080";
    ctx.fill();
    ctx.closePath();

    ctx.fillStyle = "#DCDCDC";
    ctx.fillRect(-20, -2.5, 10, 5);
    ctx.fillRect(-20, -10, 5, 20);

    ctx.fillStyle = "#778899";
    ctx.fillRect(-40, 7, 35, 5);
    ctx.fillRect(-40, -13, 35, 5);

    ctx.fillStyle = "#f00";
    ctx.fillRect(-5, 7, 3, 5);
    ctx.fillRect(-5, -13, 3, 5);

    ctx.moveTo(0, 0);
    ctx.restore();

    requestAnimationFrame(renderCanvas);
};

function processaTeclas() {
    const cosAng = Math.cos(ang);
    const sinAng = Math.sin(ang);
    
    if (teclas[39]) {
        ang += Math.PI / 90;
    }
    if (teclas[37]) {
        ang -= Math.PI / 90;
    }
    if (teclas[38]) {
        y += 2 * sinAng;
        x += 2 * cosAng;
    }
    if (teclas[40]) {
        y -= 2 * sinAng;
        x -= 2 * cosAng;
    }
}

document.addEventListener("keydown", (evt) => {
    teclas[evt.keyCode] = true;
});

document.addEventListener("keyup", (evt) => {
    teclas[evt.keyCode] = false;
});

renderCanvas();
