
	const agregarCeroSiEsNecesario = valor => {
		if (valor < 10) {
			return "0" + valor;
		} else {
			return "" + valor;
		}
	}

	const milisegundosAMinutosYSegundos = (segundos) => {
		const minutos = parseInt(segundos / 60);
		segundos -= minutos * 60 * 1;
		return `${agregarCeroSiEsNecesario(minutos)}:${agregarCeroSiEsNecesario(segundos)}`;
	};


    function cronometro(id) {
        console.log("contador de : " + id);
        let mil = 0;
        setInterval(() => {
            mil++;
            tiempo = milisegundosAMinutosYSegundos(mil);
            console.log(tiempo);
            $("#tiempoTranscurrido").html(tiempo);
        }, 1000);
    }
