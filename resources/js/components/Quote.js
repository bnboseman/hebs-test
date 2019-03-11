import axios from 'axios'
import React, {Component} from 'react'

class Quote extends Component {
    constructor(props) {
        super(props);
        this.state = {
            quote: null
        };
    }

    componentDidMount() {
        axios.get('/api/quote').then(response => {
            this.setState({
                quote: response.data.quote
            })
        }).catch((error) => {
            // handle error
            console.log(error);
            this.setState({
                error: error
            })
        })
    }


    render() {
        const {quote} = this.state;
        return (
                <h1>
                    {quote}
                </h1>
        )
    }
}

export default Quote