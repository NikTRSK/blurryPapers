export default function reducer(state={conferencepapers: []}, action) {
	switch (action.type) {
		case "CONFERENCE_RECEIVED":
		{
			return {
				...state,
				conferencepapers: action.payload
			};
		}
		case "CONFERENCE_CLEARED":
		{
			return {
				...state,
				conferencepapers: []
			}
		}
		case "CONFERENCE_REJECTED":
		{
			return {
				...state,
				conferencepapers: []
			}
		}
	}
	return state;
}