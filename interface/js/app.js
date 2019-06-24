	let source = {
		token : null,
		host : 'http://localhost:8000'
	};

	var loginInstance = new Vue ({
		el: '#login',
		data: {
			email : '',
			password : '',

			token : source,
			errors : null,
		},

		methods: {
			doLogin: function() {
	    		axios
			    	.get(this.token.host + '/login?email=' + this.email + '&password=' + this.password)
			    	.then(response => (source.token = response.data.remember_token ))
			    	.catch(error => (console.log(this.errors = error.response.data))) //console.log(error.response.data))

	      			console.log({ list_name: this.list_name, distance: this.distance, user_id: this.user_id });
	      			//tableInstance.getList();
	    	}
		}

	});
	
	var tableInstance = new Vue({

		el: '#table',
		data () {
		    return {
		    	count : 1,
				data: null,
				message: 'test',
				hasLoad: false,
				tableLoad: true,
				delete_id: '',

				token : source
		    }

		},
		methods : {
			getList: function () {
				axios
		    		.get(this.token.host + '/api/listing?id=1&remember_token=' + this.token.token)
		    		.then(response => (this.data = response.data.listing ))

		    	this.toggleClass();
			},
			toggleClass() {

					if (this.hasLoad == false) {
						this.hasLoad = true;
					} else {
						this.hasLoad = false;
					}

					if (this.tableLoad == true) {
						this.tableLoad = false;
					} else {
						this.tableLoad = true;
					}
			},
			deleteForm: function() {
	    		axios
			    	.delete(this.token.host + '/api/listing?id=' + this.delete_id + '&remember_token=' + this.token.token)
			    	.then(response => (this.data = response ))
			    	.catch(this.error()) //console.log(error.response.data))
	    	},
		}

	});

	const formInstance = new Vue({
		el: '#form',

		// our data
		data: {
			list_name: '',
			list_id: '',
			distance: '',
			user_id: '',
			data : null,
			errors : null,

			inputHost: '',

			listName : false,
			test : '',

			token : source
		},

	  	// our methods
	  	methods: {
	    	postForm: function() {
	    		axios
			    	.post(this.token.host + '/api/listing?list_name=' + this.list_name + '&distance=' + this.distance + '&user_id=' + this.user_id + '&remember_token=' + this.token.token)
			    	.then(response => (this.data = response ))
			    	.catch(this.error()) //console.log(error.response.data))
	    	},
	    	putForm: function() {
	    		axios
			    	.post(this.token.host + '/api/listing?id=' + this.list_id + '&list_name=' + this.list_name + '&distance=' + this.distance + '&user_id=' + this.user_id + '&remember_token=' + this.token.token)
			    	.then(response => (this.data = response ))
			    	.catch(this.error()) //console.log(error.response.data))
	    	},
			error() {
				return error => (console.log(this.errors = error.response.data))
			},
			setHost() {
				source.host = this.inputHost;
			}
	  	}
	});