export default function wordcloud(state = [], action) {
  if (action.type === 'GENERATE_WORDCLOUD') {
    console.log("GEN: " + action.query);
    return [ ...state, {
      value: action.query,
      count: 100
    }]
  }

  // if (action.type !== 'GET_PAPERS') {
  return state;
  // }
}