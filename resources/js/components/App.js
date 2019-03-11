import React, {Component} from 'react'
import ReactDOM from 'react-dom'
    import People from './People'
import Quote from './Quote'

class App extends Component {
    constructor() {
        super()
        this.state = {
            limit: 10
        }
        this.handleChange = this.handleChange.bind(this);
    }

    handleChange(event) {
        this.setState({limit: event.target.value});
    }

    render() {
        return (
            <div className="container">
                <div className="jumbotron text-center">
                    <Quote />
                </div>
                <div className="row">
                    <div className="col-xs-12">
                        <div className="form-group">
                            <label for="limit" className="text-info h3">Limit: {this.state.limit}
                            </label>
                            <input className="form-control-range form-control" type="range" name="limit" max="100" min="0" step="1"
                                   value={this.state.limit} onChange={this.handleChange}/>
                        </div>
                        <People limit={this.state.limit}/>

                    </div>

                </div>

            </div>
        )
    }
}

ReactDOM.render(<App/>, document.getElementById('app'))