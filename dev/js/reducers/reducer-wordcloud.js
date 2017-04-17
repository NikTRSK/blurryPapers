export default function wordcloud(state = [], action) {
  if (action.type === 'GENERATE_WORDCLOUD_FULFILLED') {
    return {
      ...state,
      paperData: action.payload
    };
  }

  if (action.type === 'GENERATE_WORDCLOUD_REJECTED') {
    console.log("WE REJECT");
  }

  return state;
}