export default function wordcloud(state = [], action) {
  if (action.type === 'GENERATE_WORDCLOUD') {
    return [ ...state, {
      value: "test",
      count: 100
    }]
  }

  // if (action.type !== 'GET_PAPERS') {
  return state;
  // }
}