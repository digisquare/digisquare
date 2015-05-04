'use strict';

export default class Textarea extends React.Component {

  constructor(props) {
    super(props);
  }

  render() {
    var tweet = this.props.tweet.trim();
    var length = 140 - (tweet.length - this.props.url.length) - 22;
    return (
      <div>
        <div className="form-group">
          <div className="col col-md-12 required">
            <div className="input-group date">
              <span className="input-group-addon">
                <span className="glyphicon glyphicon-time"></span>
              </span>
              <input
                className="form-control"
                type="text"
                value={this.props.datetime}
                name={"data[Tweet][" + this.props.index + "][scheduled_at]"}
              />
              <div className="input-group-addon">{length}</div>
            </div>
          </div>
        </div>
        <div className="form-group">
          <div className="col col-md-12">
              <textarea
                id='Tweet' className="form-control" cols="30" rows="8"
                value={tweet.trim()}
                name={"data[Tweet][" + this.props.index + "][text]"}
              />
          </div>
        </div>
      </div>
    );
  }

}
