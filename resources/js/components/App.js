import React, { Component } from 'react';
import ReactDOM from 'react-dom';

export default class App extends Component {
    render() {
        return (
            <div className="container">
                Hello world with react App
            </div>
        );
    }
}

if (document.getElementById('app')) {
    ReactDOM.render(<App />, document.getElementById('app'));
}
