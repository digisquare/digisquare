'use strict';

export default class TextInput extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    return (
      <div className="form-group">
        <div className="col col-md-12 required">
          <div className="input-group date">
            <span className="input-group-addon">
              {this.props.id}
            </span>
            <input
              onChange={this.handleChange.bind(this)}
              className="form-control"
              type="text"
              id={this.props.id}
              defaultValue={this.props.defaultValue}
            />
          </div>
        </div>
      </div>
    );
  }

  handleChange(event) {
    this.props.onChange(event.target.value);
  }

}
