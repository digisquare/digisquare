'use strict';

import TextInput from './textinput';
import Textarea from './textarea';

export default class BufferForm extends React.Component {

  constructor(props) {
    super(props);
    this.state = bufferEvent;
  }

  render() {

    var tweet_1 = this.state.weekday
      + this.state.daymonth
      + this.state.title
      + this.state.url
      + this.state.venue
      + this.state.orgas
      + this.state.hashtag;

    var tweet_2 = this.state.weekday
      + 'prochain '
      + this.state.title
      + this.state.url
      + this.state.time
      + this.state.venue
      + this.state.orgas
      + this.state.hashtag;

    var tweet_3 = this.state.dday
      + this.state.time
      + this.state.title
      + this.state.url
      + this.state.venue
      + this.state.orgas
      + this.state.hashtag;

    return (
      <div className="row">
        <div className="col-md-6">
            <div className="well form-horizontal">
              <TextInput onChange={this.handleWeekday.bind(this)} id='Weekday' defaultValue={this.state.weekday} />
              <TextInput onChange={this.handleDayMonth.bind(this)} id='DayMonth' defaultValue={this.state.daymonth} />
              <TextInput onChange={this.handleTitle.bind(this)} id='Title' defaultValue={this.state.title} />
              <TextInput onChange={this.handleUrl.bind(this)} id='Url' defaultValue={this.state.url} />
              <TextInput onChange={this.handleTime.bind(this)} id='Time' defaultValue={this.state.time} />
              <TextInput onChange={this.handleVenue.bind(this)} id='Venue' defaultValue={this.state.venue} />
              <TextInput onChange={this.handleOrgas.bind(this)} id='Orgas' defaultValue={this.state.orgas} />
              <TextInput onChange={this.handleHashtag.bind(this)} id='Hashtag' defaultValue={this.state.hashtag} />
            </div>
        </div>
        <div className="col-md-6">
          <div className="well form-horizontal">
            <Textarea index="0" tweet={tweet_1} url={this.state.url} datetime={'now'} />
            <Textarea index="1" tweet={tweet_2} url={this.state.url} datetime={this.state.tweet_2} />
            <Textarea index="2" tweet={tweet_3} url={this.state.url} datetime={this.state.tweet_3} />
            <div className="form-group">
              <div className="col col-md-12">
                <div className="submit">
                  <input className="btn btn-primary pull-right" type="submit" value="Buffer" />
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }

  handleWeekday(weekday) {
    this.setState({
      weekday
    });
  }

  handleDayMonth(daymonth) {
    this.setState({
      daymonth
    });
  }

  handleTitle(title) {
    this.setState({
      title
    });
  }

  handleUrl(url) {
    this.setState({
      url
    });
  }

  handleTime(time) {
    this.setState({
      time
    });
  }

  handleVenue(venue) {
    this.setState({
      venue
    });
  }

  handleOrgas(orgas) {
    this.setState({
      orgas
    });
  }

  handleHashtag(hashtag) {
    this.setState({
      hashtag
    });
  }

}
