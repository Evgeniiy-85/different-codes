function show_numbers() {
	this.count_numbers = 100;

	for (var number = 1; number <= this.count_numbers; number ++) {
		this.result = '';

		if (number % 3 === 0) {
			this.result = 'foo';
		}

		if (number % 5 === 0) {
			this.result += 'bar';
		}

		if (this.result) {
			console.log(number + ': ' + this.result);
		}
	}
}

show_numbers();
