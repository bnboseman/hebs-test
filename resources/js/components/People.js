import axios from 'axios'
import React, {Component} from 'react'

class People extends Component {
    constructor(props) {

        super(props)
        this.state = {
            people: [],
            limit: props.limit
        }
    }

    componentDidMount() {
        axios.get(`/api/person?limit=${this.state.limit}`).then(response => {
            this.setState({
                people: response.data
            })
        }).catch((error) => {
            // handle error
            console.log(error);
            this.setState({
                error: error
            })
        })
    }

    componentWillReceiveProps(props) {
        this.setState({limit: props.limit}, () => this.componentDidMount());
    }

    render() {
        const {people} = this.state;
        return (
            <div>
            <table className="table table-responsive table-hover">
                <thead className="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Job Title</th>
                    <th>Posts</th>
                </tr>
                </thead>
                <tbody>
                {people.map(person => (
                    <tr>
                        <td>{person.id}</td>
                        <td>{person.first_name}</td>
                        <td>{person.last_name}</td>
                        <td>{person.email}</td>
                        <td>{person.address}</td>
                        <td>{person.job_title}</td>
                        <td>{person.posts.map(post => (
                            <div>
                                <h2 className="h5">{post.title}</h2>
                                <p>{post.body}</p>
                                <hr />

                            </div>
                        ))}
                        </td>
                    </tr>

                ))}
                </tbody>
            </table>
            </div>
        )
    }
}

export default People