export function generatePapers(query) {
  console.log("Querying API");
  return {
    type: 'GENERATE_WORDCLOUD',
    query
  }
}

export function getPapers(word, count) {
  console.log("GETTING PAPERS: " + word + ", " + count);
  return {
    type: 'GET_PAPERS',
    word,
    count
  }
}